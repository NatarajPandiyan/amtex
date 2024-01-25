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
                                    <h4 class="card-title">Employee</h4>
                                    {{$mode}}
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    @if($mode=='Edit')
                                        <form class="form form-vertical" id="employee" method="post" action="/employee/update">
                                            <input type="hidden" name="id" value="{{$employee->id}}">
                                    @else
                                    <form class="form form-vertical" id="employee" method="post" action="/employee/save">
                                    @endif
                                        @csrf
                                        <div class="form-body">
                                        <div class="row col-12">
                                              
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Employee Name</label>
                                                            <input type="text" id="name" value="{{old('employee_name',$employee->employee_name)}}"
                                                                class="form-control" name="name"
                                                                placeholder="employee Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">Mobile</label>
                                                            <input type="text" id="mobile" value="{{old('mobile',$employee->mobile)}}"
                                                                class="form-control" name="mobile"
                                                                placeholder="employee Mobile">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Email</label>
                                                            <input type="text" id="email" value="{{old('email',$employee->email)}}"
                                                                class="form-control" name="email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password-vertical">Address</label>
                                                            <input type="text" id="address" value="{{old('thickness',$employee->address)}}"
                                                                class="form-control" name="address"
                                                                placeholder="address">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">DOB</label>
                                                            <input type="date" id="dob" value="{{old('mobile',$employee->dob)}}"
                                                                class="form-control datepicker" name="dob"
                                                                >
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Designation</label>
                                                            <input type="text" id="designation" value="{{old('designation',$employee->designation)}}"
                                                                class="form-control" name="designation"
                                                                placeholder="Designation">
                                                        </div>
                                                    </div>
                                                   
                                                  
                                                    <div class="col-6">
                                                        <div class='form-check'>
                                                            <div class="checkbox mt-2">
                                                            @if($mode=='Edit')
                                                            <input type="checkbox" name="status" class="form-check-input" {{ ($employee->isactive=='1') ? 'checked' : ''}} > IsActive
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
$("#employee    ").validate({
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
         dob:{
            required: true
         },
         designation:{
            required: true
            
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
         dob:{
            required: 'This field is Required '
         },
         designation:{
            required: 'This field is Required ',
           
         }
    },
    errorPlacement: function (error, element) {
        error.insertAfter(element.parent());
    }
});
})(jQuery);
</script>
@endpush