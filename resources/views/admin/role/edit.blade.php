@extends('admin.layout.master')
@section('content')

<div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $page_name }}</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                              @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                        @foreach($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif

                                  <hr>
                                  {{ Form::model($role, ['route' => ['role-update', $role->id], 'method'=>'put']) }}

                                      <div class="form-group">
                                      {{ Form::label('name', 'Name', ['class' => 'control-label mb-1', 'id' => 'name']) }}
                                      {{ Form::text('name', null, ['class' => 'form-control']) }}
                                      </div>
                                      
                                      <div class="form-group">
                                      {{ Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1', 'id' => 'display_name']) }}
                                      {{ Form::text('display_name', null, ['class' => 'form-control']) }}
                                      </div>

                                      <div class="form-group">
                                      {{ Form::label('description', 'Description', ['class' => 'control-label mb-1', 'id' => 'description']) }}
                                      {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                                      </div>

                                      <div class="form-group">
                                      {{ Form::label('permission', 'Permission', ['class' => 'control-label mb-1']) }}
                                      {{ Form::select('permission[]', $permission, $selectedPermission, ['class' => 'form-control myselect', 'data-placeholder' => 'Select permissions', 'multiple']) }}
                                      </div>


                                      <div>
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <i class="fa fa-lock fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Submit</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
                                      </div>
                                      {{ Form::close() }}
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

@endsection