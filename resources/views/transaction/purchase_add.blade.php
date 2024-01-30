@extends('layouts.app')
@section('content')
@push('css-plugin')

<link rel="stylesheet" href="{{asset('/vendors/simple-datatables/style.css')}}">
<link rel="stylesheet" href="{{asset('/vendors/choices.js/choices.min.css')}}"/>
<style>
h6,table tr th
{
    color:#213a91;
    
}
table tr td
{
    color:#000;
}

</style>
@endpush
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Purchase Add</h3>
                        </div>
                       
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                       
                        <div class="card-body">
                        <div class="col-12 col-md-12">
                            <div class="card">
                                
                                <div class="card-content">
                                    <div class="card-body">

                                        
                                        <div class="col-md-12 mb-4">
                                                
                                             <div class="row">
                                                <div class="col-md-6 pt-2">
                                                <h6>Vendor Select</h6>
                                                <div class="form-group">
                                                    <select class="choices form-select" id="vendorSelect">
                                                    @foreach($purchase as $purchaseList )
                                                            <option value="{{$purchaseList->id}}">{{$purchaseList->vendor_name}}</option>
                                                           
                                                    @endforeach      
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <table class="table  table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th><small>Vendor Mobile</small></th>
                                                        <th><small>GST Number</small></th>
                                                        
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <td>98884898888</td>
                                                    <td>2526189</td>
                                                </tbody>
                                                </table>
                                                </div>
                                                </div>
                                            </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th><small>Materail</small></th>
                                                        <th><small>Qty</small></th>
                                                        <th><small>Rate</small></th>
                                                        <th><small>GST</small></th>
                                                        <th><small>Gst Amount</small></th>
                                                        <th><small>Discount</small></th>
                                                        <th><small>Total Amount</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                    <tr>
                                                        <td><input type="text" id="materail" class="form-control" name="materail"></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname" ></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname" ></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname" ></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname"></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname"></td>
                                                        <td><input type="text" id="first-name" class="form-control" name="fname"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th><small>Materail</small></th>
                                                        <th><small>Qty</small></th>
                                                        <th><small>Rate</small></th>
                                                        <th><small>GST</small></th>
                                                        <th><small>Gst Amount</small></th>
                                                        <th><small>Discount</small></th>
                                                        <th><small>Total Amount</small></th>
                                                        <th><small>Remove</small></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        </div>
                    </div>

                </section>
            </div>

            @push('js-plugin')
            <script src="{{asset('/vendors/simple-datatables/simple-datatables.js')}}"></script>
            <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('/vendors/choices.js/choices.min.js')}}"></script>
            <script src="{{asset('assets/js/main.js')}}"></script>
<!-- Include Choices JavaScript -->

            @endpush
            @push('js-script')
            <script>
        $(document).ready(function()
        {
            $url='';
            $('#vendorSelect').on('change', function() {
                $.ajax({
                url: ,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    
                }
            });
                });
        });
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
       
            </script>
            
            @endpush
            @stop