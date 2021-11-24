<?php

namespace Tests\Feature;

use App\Models\TodoItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoItemTest extends TestCase
{
    use RefreshDatabase;
    public function test_fetch_all_todo_items()
    {
        $item = TodoItem::factory()->create();
        $response = $this->getJson(route('todo-item.index'))
            ->assertOk()->json();
        $this->assertEquals(1, count($response));
        $this->assertEquals($item->title, $response[0]['title']);
    }
}
