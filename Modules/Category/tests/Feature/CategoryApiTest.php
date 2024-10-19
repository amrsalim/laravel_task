<?php
//
//use App\Models\Category;
//use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//
//uses(Tests\TestCase::class, RefreshDatabase::class)->in(__DIR__);
//
//
//
//
//
//// Test to ensure a category can be created
//it('can create a category', function () {
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Data for the new category
//    $data = [
//        'name' => 'New Category',
//        'description' => 'This is a new category.',
//        'slug' => 'new-category',
//        'status' => true,
//        'user_id' => $user->id,  // Assuming a category is linked to a user
//    ];
//
//    // Send POST request to the correct category creation route
//    $response = $this->postJson(route('category.store'), $data);
//
//    // Check the response
//    $response->assertStatus(201)
//        ->assertJsonFragment(['name' => 'New Category']);
//
//    // Ensure it exists in the database
//    $this->assertDatabaseHas('categories', ['slug' => 'new-category']);
//});
//
//// Test to ensure a specific category can be fetched by ID
//it('can fetch a category by id', function () {
//    // Create a category
//    $category = Category::factory()->create();
//
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Send a GET request
//    $response = $this->getJson(route('category.show', $category->id));
//
//    // Check the response
//    $response->assertStatus(200)
//        ->assertJsonFragment(['name' => $category->name]);
//});
//
//// Test to ensure a category can be updated
//it('can update a category', function () {
//    // Create a category
//    $category = Category::factory()->create();
//
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Data for updating the category
//    $data = [
//        'name' => 'Updated Category',
//        'description' => 'This category has been updated.',
//        'slug' => 'updated-category',
//        'status' => false,
//    ];
//
//    // Send PUT request
//    $response = $this->putJson(route('category.update', $category->id), $data);
//
//    // Check the response
//    $response->assertStatus(200)
//        ->assertJsonFragment(['name' => 'Updated Category']);
//
//    // Ensure the changes exist in the database
//    $this->assertDatabaseHas('categories', ['slug' => 'updated-category']);
//});
//
//// Test to ensure a category can be soft deleted
//it('can soft delete a category', function () {
//    // Create a category
//    $category = Category::factory()->create();
//
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Send DELETE request
//    $response = $this->deleteJson(route('category.destroy', $category->id));
//
//    // Check the response
//    $response->assertStatus(200);
//
//    // Ensure the category is soft deleted
//    $this->assertSoftDeleted('categories', ['id' => $category->id]);
//});
//
//// Test to ensure a soft-deleted category can be restored
//it('can restore a soft deleted category', function () {
//    // Create a category
//    $category = Category::factory()->create();
//    $category->delete(); // Soft delete it
//
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Send GET request to restore the category
//    $response = $this->getJson(route('category.restore', $category->id));
//
//    // Check the response
//    $response->assertStatus(200);
//
//    // Ensure the category is restored
//    $this->assertDatabaseHas('categories', ['id' => $category->id, 'deleted_at' => null]);
//});
//
//// Test to ensure a category can be force deleted
//it('can force delete a category', function () {
//    // Create a category
//    $category = Category::factory()->create();
//
//    // Act as a user
//    $user = User::factory()->create();
//    $this->actingAs($user, 'api');
//
//    // Send DELETE request to force delete
//    $response = $this->deleteJson(route('category.forceDelete', $category->id));
//
//    // Check the response
//    $response->assertStatus(200);
//
//    // Ensure the category is completely removed from the database
//    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
//});
