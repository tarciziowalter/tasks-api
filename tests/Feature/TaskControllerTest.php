<?php

use App\Models\Task;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    public function test_authenticated_user_can_create_task()
    {
        // Cria um usuário de teste usando factory
        $user = User::factory()->create();

        // Autentica o usuário usando Sanctum
        Sanctum::actingAs($user);

        // Chama o endpoint para criar uma nova tarefa
        $response = $this->postJson('/api/tasks', [
            'title' => 'Nova Tarefa',
            'description' => 'Descrição da nova tarefa',
            'status' => 'pendente',
        ]);

        // Verifica se a tarefa foi criada com sucesso
        $response->assertStatus(201);
    }

    public function test_authenticated_user_can_view_task_details()
    {
        // Cria um usuário de teste usando factory e autentica-o
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Cria uma tarefa de teste
        $task = Task::factory()->create();

        // Chama o endpoint para visualizar os detalhes da tarefa criada
        $response = $this->getJson('/api/tasks/' . $task->id);

        // Verifica se a resposta foi bem-sucedida e se contém os detalhes da tarefa
        $response->assertStatus(200)
                 ->assertJson($task->toArray());
    }

    public function test_authenticated_user_can_view_all_tasks()
    {
        // Cria um usuário de teste usando factory e autentica-o
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Cria algumas tarefas de teste
        $tasks = Task::factory()->count(3)->create();
        
        // Chama o endpoint para visualizar todas as tarefas
        $response = $this->getJson('/api/tasks');
        
        // Verifica se a resposta foi bem-sucedida e se contém todas as tarefas
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_update_task()
    {
        // Cria um usuário de teste usando factory e autentica-o
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Cria uma tarefa de teste
        $task = Task::factory()->create();

        // Dados para atualização da tarefa
        $data = [
            'title' => 'Título atualizado',
            'description' => 'Descrição atualizada',
            'status' => 'concluída',
        ];

        // Chama o endpoint para atualizar a tarefa
        $response = $this->putJson('/api/tasks/' . $task->id, $data);

        // Verifica se a tarefa foi atualizada corretamente no banco de dados
        $this->assertDatabaseHas('tasks', $data);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(200)
                 ->assertJson($data); // Verifica se os dados retornados correspondem aos dados atualizados
    }

    public function test_authenticated_user_can_delete_task()
    {
        // Cria um usuário de teste usando factory e autentica-o
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Cria uma tarefa de teste
        $task = Task::factory()->create();

        // Chama o endpoint para excluir a tarefa
        $response = $this->deleteJson('/api/tasks/' . $task->id);

        // Verifica se a tarefa foi excluída corretamente do banco de dados
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        // Verifica se a resposta foi bem-sucedida
        $response->assertStatus(204); // 204 - No Content
    }
}