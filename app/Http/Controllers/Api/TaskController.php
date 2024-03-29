<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskRequest;
use App\Repositories\TaskRepositoryInterface;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Retorna todas as tarefas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tasks = $this->taskRepository->all();
        return response()->json($tasks);
    }

    /**
     * Armazena uma nova tarefa.
     *
     * @param  \App\Http\Requests\Api\TaskRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskRepository->create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Retorna os detalhes de uma tarefa específica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $task = $this->taskRepository->find($id);
        return response()->json($task);
    }

    /**
     * Atualiza uma tarefa existente.
     *
     * @param  \App\Http\Requests\Api\TaskRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TaskRequest $request, $id)
    {
        $task = $this->taskRepository->update($request->all(), $id);
        return response()->json($task);
    }

    /**
     * Exclui uma tarefa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->taskRepository->delete($id);
        return response()->json(null, 204);
    }
}
