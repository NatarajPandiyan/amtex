@extends('layouts.app')
@push('css-script')
<style>
    .invalid{
        color:red;
    }
</style>
@endpush
@section('content')
<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Customer</h4>
                                    {{$mode}}
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    @if($mode=='Edit')
                                        <form class="form form-vertical" id="customer" method="post" action="/customer/update">
                                            <input type="hidden" name="id" value="{{$customer->id}}">
                                    @else
                                    <form class="form form-vertical" id="customer" method="post" action="/customer/save">
                                    @endif
                                        @csrf
                                        <div class="form-body">
                                        <div class="row col-12">
                                              
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Customer Name</label>
                                                            <input type="text" id="name" value="{{old('customer_name',$customer->customer_name)}}"
                                                                class="form-control" name="name"
                                                                placeholder="Customer Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Mobile</label>
                                                            <input type="text" id="mobile" value="{{old('mobile',$customer->mobile)}}"
                                                                class="form-control" name="mobile"
                                                                placeholder="Customer Mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Email</label>
                                                            <input type="text" id="email" value="{{old('email',$customer->email)}}"
                                                                class="form-control" name="email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Address</label>
                                                            <input type="text" id="address" value="{{old('thickness',$customer->address)}}"
                                                                class="form-control" name="address"
                                                                placeholder="address">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">POC Name</label>
                                                            <input type="text" id="poc_name" value="{{old('mobile',$customer->poc_name)}}"
                                                                class="form-control" name="poc_name"
                                                                placeholder="POC Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">POC Mobile</label>
                                                            <input type="text" id="poc_mobile" value="{{old('poc_mobile',$customer->poc_mobile)}}"
                                                                class="form-control" name="poc_mobile"
                                                                placeholder="POC Mobile">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">GST No</label>
                                                            <input type="text" id="gst_no" value="{{old('mobile',$customer->gst_no)}}"
                                                                class="form-control" name="gst_no"
                                                                placeholder="GST No">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                            @if($mode=='Edit')
                                                            <input type="checkbox" name="status" class="form-check-input" {{ ($customer->isactive=='1') ? 'checked' : ''}} > IsActive
                                                            @else   
                                                            <input type="checkbox" name="status" class="form-check-input"  checked="checked" > IsActive
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>

                                                </div>     
                                        <div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
@stop

    @push('js-plugin')
    <script src="{{asset('./js/jquery.validate.min.js')}}"></script>
    @endpush
    @push('js-script')
    <script>
(function ($) {

"use strict";
$("#customer    ").validate({
    rules: {
        name: {
            required: true,
        },
        mobile: {
             required: true,
             number:true
         },
         email: {
             required: true,
             email:true
         },
         address: {
             required: true
            
         },
         poc_name:{
            required: true
         },
         poc_mobile:{
            required: true,
            number:true
         },
         gst_no:{
            required: true,
            number:true
         }
    },
    messages: {
        name: {
            required: 'This field is Required ',
        },
        mobile: {
             required: 'This field is Required ',
             number:'Only Number Allowed'
        },
       
         email:{
             required: 'This field is Required ',
             email:'Invalid Email Id',
        },
        address: {
             required: 'This field is Required '
         },
         poc_name:{
            required: 'This field is Required '
         },
         poc_mobile:{
            required: 'This field is Required ',
             number:'Only Number Allowed'
         },
         gst_no:{
            required: 'This field is Required ',
             number:'Only Number Allowed'
         }

    },
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    }
});
})(jQuery);
</script>
@endpush