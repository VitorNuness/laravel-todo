<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A test to get data from todos table.
     */
    public function test_todo_index_empty(): void
    {
        $response = $this->get('/todos');
        $response->assertStatus(200)
            ->assertJsonStructure(["data"]);
    }

    public function test_todo_index_json_sctructure(): void
    {
        $data = [
            "description" => 'Todo 1',
            "is_complete" => 1
        ];
        $this->post('/todos', $data);

        $response = $this->get('/todos');
        $response->assertStatus(200)
            ->assertJsonStructure([
                "data" => [
                    [
                        "id",
                        "description",
                        "is_complete",
                        "category",
                        "created_at",
                        "updated_at",
                    ],
                ],
            ]);
    }

    /**
     * A test to store values into todos table.
     */
    public function test_todo_store(): void
    {
        $data = [
            "description" => 'Todo 1',
            "is_complete" => 1
        ];

        $response = $this->post('/todos', $data);
        $response->assertCreated()
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "description",
                    "is_complete",
                    "category",
                    "created_at",
                    "updated_at",
                ],
            ]);
    }

    public function test_todo_show():void
    {
        $data = [
            "description" => 'Todo 1',
            "is_complete" => 1
        ];

        $this->post('/todos', $data);
        $response = $this->get('/todos/1');
        $response->assertOk()
            ->assertJsonStructure([
                "data" => [
                    "id",
                    "description",
                    "is_complete",
                    "category",
                    "created_at",
                    "updated_at",
                ],
            ]);
    }

    /**
     * A test to verify validations on create and update.
     */
    public function test_store_update_validations(): void
    {
        $data = [
            "description" => null,
            "is_complete" => 1
        ];

        $response = $this->post('/todos', $data);
        $response->assertRedirect();
    }

    /**
     * A test to update a value into todos table.
     */
    public function test_todo_update(): void
    {
        $data = [
            "description" => 'Todo 1',
            "is_complete" => 1
        ];
        $response = $this->post('/todos', $data);
        $data = [
            "description" => 'Todo 2',
            "is_complete" => 1
        ];
        $response = $this->patch('/todos/1', $data);
        $response->assertOk()
        ->assertJsonStructure([
            "data" => [
                "id",
                "description",
                "is_complete",
                "category",
                "created_at",
                "updated_at",
            ],
        ]);
    }

    /**
     * A test to delete value by id from todos table.
     */
    public function test_todo_delete(): void
    {
        $data = [
            "description" => 'Todo 1',
            "is_complete" => 1
        ];
        $response = $this->post('/todos', $data);
        $response = $this->delete('/todos/1');
        $response->assertNoContent();
    }
}
