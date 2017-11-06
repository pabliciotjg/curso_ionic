<?php

namespace APp\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function updateSettings(Request $request)
    {
        $data = $request->only('password');
        $this->repository->update($data, $request->user('api')->id);

        return $request->user('api');
    }

//    public function addCpf(AddCpfRequest $request)
//    {
//        $user = $this->repository->update([
//            'cpf' => $request->input('cpf')
//        ],$request->user('api')->id);
//        return $user;
//    }
}
