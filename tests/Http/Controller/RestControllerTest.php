<?php


namespace Http\Controller;


use App\JwtUser;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RestControllerTest extends \TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public $path = '/';

    public function authenticateRequest()
    {
        $user = factory(JwtUser::class)->make();
        $this->actingAs($user);
    }

    public function testGetAuthenticatedWhenOK()
    {
        $this->authenticateRequest();
        $response = $this->call('GET', "{$this->path}/1");
        $this->assertEquals(200, $response->status());
    }

    public function testGetAllAuthenticatedWhenOK()
    {
        $this->authenticateRequest();
        $response = $this->call('GET', $this->path);
        $this->assertEquals(200, $response->status());
    }

    public function testCreateAuthenticatedWhenCreate()
    {
        $this->authenticateRequest();
        $response = $this->call('POST', $this->path);
        $this->assertEquals(201, $response->status());
    }

    public function testUpdateAuthenticatedWhenOK()
    {
        $this->authenticateRequest();
        $response = $this->call('PUT', "{$this->path}/1");
        $this->assertEquals(200, $response->status());
    }

    public function testDeleteAuthenticatedWhenNotContent()
    {
        $this->authenticateRequest();
        $response = $this->call('DELETE', "{$this->path}/1");
        $this->assertEquals(204, $response->status());
    }

    public function testGetWithoutAuthenticatedWhenForbidden()
    {
        $response = $this->call('GET', "{$this->path}/1");
        $this->assertEquals(401, $response->status());
    }

    public function testGetAllWithoutAuthenticatedWhenForbidden()
    {
        $response = $this->call('GET', $this->path);
        $this->assertEquals(401, $response->status());
    }

    public function testCreateWithoutAuthenticatedWhenForbidden()
    {
        $response = $this->call('POST', $this->path);
        $this->assertEquals(401, $response->status());
    }

    public function testUpdateWithoutAuthenticatedWhenForbidden()
    {
        $response = $this->call('PUT', "{$this->path}/1");
        $this->assertEquals(401, $response->status());
    }

    public function testDeleteWithoutAuthenticatedWhenForbidden()
    {
        $response = $this->call('DELETE', "{$this->path}/1");
        $this->assertEquals(401, $response->status());
    }
}
