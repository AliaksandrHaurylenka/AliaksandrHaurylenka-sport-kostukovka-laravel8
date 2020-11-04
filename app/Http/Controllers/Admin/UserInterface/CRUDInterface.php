<?php
namespace App\Http\Controllers\Admin\UserInterface;


interface CRUDInterface
{
//  public function gate($action);

  public function index();

  public function create();

  public function store($request);

  public function edit($id);

  public function update($request, $id, $columnSlug);

  public function show($id);

  public function destroy($id);

  public function massDestroy($request);

  public function restore($id);

  public function perma_del($id);
}
