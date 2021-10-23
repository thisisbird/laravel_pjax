@extends('backend.layout-concept.app')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- valifation types -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Validation Types</h5>
            <div class="card-body">
                <form id="validationform" data-parsley-validate="" novalidate="" action="{{route('backend.user.update',$user->id)}}" method="POST" pjax-container>
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">role</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <select class="form-control" name="role_id">
                                <option value="0">請選擇角色權限</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}" {{$user->role && $user->role->id == $role->id ? 'selected':''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">name</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required="" placeholder="Type something" class="form-control" value="{{$user->name}}" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">account</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" required="" placeholder="Type something" class="form-control" value="{{$user->account}}" name="account">
                            @if($errors->count())
                            @foreach ($errors->all() as $error)
                            <ul class="parsley-errors-list filled"><li class="parsley-required">{{$error}}</li></ul>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Equal To</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input id="pass2" type="password" placeholder="Password" class="form-control" name="password">
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="password" data-parsley-equalto="#pass2"
                                placeholder="Re-Type Password" class="form-control">
                        </div>
                    </div>
                    
                  
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" value="{{$user->email}}" name="email"
                                class="form-control">
                        </div>
                    </div>
                   
                    {{-- <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Number</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input data-parsley-type="number" type="text" required="" placeholder="Enter only numbers"
                                class="form-control">
                        </div>
                    </div> --}}
                    
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                            <button class="btn btn-space btn-secondary" onclick="window.history.back();">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end valifation types -->
    <!-- ============================================================== -->
</div>
<script>
    $('#validationform').parsley();
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //         // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //         var forms = document.getElementsByClassName('needs-validation');
    //         // Loop over them and prevent submission
    //         var validation = Array.prototype.filter.call(forms, function(form) {
    //             form.addEventListener('submit', function(event) {
    //                 if (form.checkValidity() === false) {
    //                     event.preventDefault();
    //                     event.stopPropagation();
    //                 }
    //                 form.classList.add('was-validated');
    //             }, false);
    //         });
    //     }, false);
    // })();
</script>
@endsection