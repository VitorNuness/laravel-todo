<?php

namespace Tests\Unit;

use App\Models\Todo;
use App\Repositories\TodoRepository;
use App\Services\TodoService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TodoServiceTest extends TestCase
{
    
    use DatabaseMigrations;
    private TodoService $service;
    private array $data;

    protected function setUp(): void
    {
        parent::setUp();
        $model = New Todo;
        $repository = New TodoRepository($model);
        $this->service = New TodoService($repository);
        $this->data = [
            "description" => "Todo 1",
            "is_complete" => "0",
        ];
    }

    public function testGetAllTodosIsEmpty(): void
    {
        $this->assertEmpty($this->service->getAllTodos());
    }

    public function testGetAllTodosReturnValues(): void
    {
        $this->service->createTodo($this->data);
        $this->assertNotEmpty($this->service->getAllTodos());
        $this->assertIsObject($this->service->getAllTodos());
    }

    public function testCreateTodo(): void
    {
        $this->assertIsObject($this->service->createTodo($this->data));
    }
}
