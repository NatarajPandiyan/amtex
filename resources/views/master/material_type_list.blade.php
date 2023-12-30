@extends('layouts.app')
@section('content')
@push('css-plugin')
<link rel="stylesheet" href="{{asset('/vendors/simple-datatables/style.css')}}">
@endpush
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Material Type</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <a href="/materialType/detail" class="btn btn-primary">Add New</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                        Material Type List
                        </div>
                        <div class="card-body">
                            
                        <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Width</th>
                                        <th>Diamention</th>
                                        <th>Thickness</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($materialTypes as $mt )
                                    <tr>
                                        <td>{{$mt->material_name}}</td>
                                        <td>{{$mt->width}}</td>
                                        <td>{{$mt->dimension}}</td>
                                        <td>{{$mt->thickness}}</td>
                                        @if($mt->isactive=='1')
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        @else
                                        <td>
                                            <span class="badge bg-danger">InActive</span>
                                        </td>
                                        @endif

                                        <td>
                                             <a href="/materialType/detail/{{$mt->id}}" Class="btn btn-success"> Edit</a> 
                                            <form method="post" action="/materialtype/destroy/{{$mt->id}}">
                                                @csrf
                                             <button class="btn btn-danger">Delete</button>
                                             </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            @push('js-plugin')
            <script src="{{asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
            @endpush
            @push('js-script')
            <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
            </script>
            
            @endpush
            @stop