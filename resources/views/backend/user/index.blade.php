@extends('backend.layout.app')
@section('content')
<div class="page-heading">
    <h3>User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with outer spacing</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p class="card-text">Using the most basic table up, here’s how
                                <code>.table</code>-based tables look in Bootstrap. You can use any example
                                of below table for your table and it can be use with any type of bootstrap
                                tables.
                            </p>
                            <div class="row">
                                <form action="{{route('backend.user.index')}}" method="get" pjax-container>
                                <div class="col-md-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input value="{{$request->search}}" type="text" name="search" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg table-hover table-striped ">
                                    <thead>
                                        <tr>
                                            <th>名稱</th>
                                            <th>信箱</th>
                                            <th>帳號</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="text-bold-500">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-bold-500">{{$user->account}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<script>

    
</script>

@endsection