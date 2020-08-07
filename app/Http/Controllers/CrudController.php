<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class CrudController extends Controller
{
    /** @var string $serviceClassName */
    protected $serviceClassName;

    /** @var string $requestFormClassName */
    protected $requestFormClassName;

    private $crudRequestValidator;
    private $serviceResource;

    public function __construct()
    {
        $this->serviceResource = new $this->serviceClassName;
        $this->crudRequestValidator = new $this->requestFormClassName;
    }

    public function index(Request $request)
    {
        return $this->serviceResource->findAll($request->per_page);
    }

    public function show(int $id)
    {
        return $this->serviceResource->findById($id);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);
        $resource = $this->serviceResource->save($request->all());
        return response()->json($resource, 201);
    }

    public function update(int $id, Request $request)
    {
        $this->validateRequest($request);
        $resource = $this->serviceResource->update($id, $request->all());
        return response()->json($resource, 200);
    }

    public function destroy(int $id)
    {
        $this->serviceResource->remove($id);
        return response()->json('', 204);
    }

    public function validateRequest(Request $request)
    {
        $this->validate(
            $request,
            $this->crudRequestValidator->rules,
            $this->crudRequestValidator->messages,
            $this->crudRequestValidator->customAttributes
        );
    }
}
