<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CreateDepartmentService;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use App\Exceptions\DepartmentAlreadyExistsException;
use App\Exceptions\DepartmentDescriptionTooShortException;
use Mockery;

class CreateDepartmentServiceTest extends TestCase
{
    protected $mockDepartmentRepository;
    protected $service;

    public function setUp(): void
    {
        parent::setUp();
    
        /** @var DepartmentRepositoryInterface&\Mockery\MockInterface */
        $this->mockDepartmentRepository = Mockery::mock(DepartmentRepositoryInterface::class);
    
        // Bind the mock repository in Laravel's service container
        $this->app->instance(DepartmentRepositoryInterface::class, $this->mockDepartmentRepository);
    
        // Resolve the service from the container (it will now use the mock)
        $this->service = app(CreateDepartmentService::class);
    }

    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    public function test_create_department_should_return_a_department()
    {
        // Arrange (Simulate DB responses)
        $inputData = ['name' => 'Electronic', 'description' => 'All kinds of products'];
        $savedDepartment = new Department(['id' => 1] + $inputData);

        // Mock repository behavior
        $this->mockDepartmentRepository->shouldReceive('existsByName')
            ->with('Electronic')
            ->once()
            ->andReturn(false);

        $this->mockDepartmentRepository->shouldReceive('create')
            ->once()
            ->with($inputData)
            ->andReturn($savedDepartment);

        // Act
        $result = $this->service->createDepartment($inputData);

        // Assert
        $this->assertInstanceOf(Department::class, $result);
        //$this->assertEquals(1, $result->id);
        $this->assertEquals('Electronic', $result->name);
        $this->assertEquals('All kinds of products', $result->description);
    }

    public function test_create_department_should_return_department_already_exists_exception()
    {
        // Arrange (Simulate department already existing in DB)
        $inputData = ['name' => 'Electronics', 'description' => 'All kinds of products'];

        $this->mockDepartmentRepository->shouldReceive('existsByName')
            ->with('Electronics')
            ->once()
            ->andReturn(true); // Simulate existing department

        // Act & Assert
        $this->expectException(DepartmentAlreadyExistsException::class);
        $this->service->createDepartment($inputData);
    }

    public function test_create_department_should_return_department_description_too_short_exception()
    {
        // Arrange
        $inputData = ['name' => 'Electronics', 'description' => 'none'];

        // Act & Assert
        $this->expectException(DepartmentDescriptionTooShortException::class);
        $this->service->createDepartment($inputData);
    }
}
