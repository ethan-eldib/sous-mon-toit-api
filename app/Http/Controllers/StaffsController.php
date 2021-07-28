<?php


namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

class StaffsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getAllStaff(): JsonResponse
    {
        return response()->json(Staffs::all());
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function getOneById($id): jsonResponse
    {
        return response()->json(Staffs::find($id));
    }

    /**
     * @param $id
     * @return Response|ResponseFactory
     */
    public function archive($id)
    {
        $staff = Staffs::findOrFail($id);
        $staff->archived_at = date("Y-m-d H:i:s");
        $staff->save();

        return response('Utilisateur archivé avec succès', 200);
    }


    /**
     * @param Request $request
     * @return array
     */
    public function create(Request $request): array
    {
        /** @var TYPE_NAME $login */
        $login = strtolower(substr($request->firstname,0 , 1)) . strtolower($request->lastname);

        $staff = new Staffs;

        $response = $staff->create([
            'login' => $login,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'updated_at' => null,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'password' => $request->password,
            'avatar' => $request->avatar,
            'alert_reader' => 0,
            'id_function' => $request->id_function,
            'id_role' => $request->id_role,
        ]);

        return [$response];
    }

    /**
     * @param $id
     * @param Request $request
     * @return array
     */
    public function update($id, Request $request): array
    {
       $staff = Staffs::findOrFail($id);
       $staff->update($request->all());

        return [$staff];
    }
}
