@extends('partials.layout')

@section('content')


<div id="wrapper" style="min-height: 612px;">

        <div class="normalheader transition animated fadeIn">
            <div class="hpanel">
                <div class="panel-body">
                    <a class="small-header-action" href="">
                        <div class="clip-header">
                            <i class="fa fa-arrow-up"></i>
                        </div>
                    </a>
                    <h2 class="font-light m-b-xs">Grupuri de utilizatori</h2>
                </div> <!-- .panel-body -->
            </div> <!-- .hpanel -->
        </div> <!-- .normalheader -->
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hpanel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif

                                    <form action="{{ URL::to('/admin/user-groups/') }}" method="POST">

                                        <div class="form-group">
                                            <label for="name">Numele Grupului:</label>
                                            <input type="text" name="group_name" id="group_name" class="form-control" value="{{ old('group_name') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="group">Permisiuni:</label>
                                            <div class="pre-scrollable" id="access">

                                            @if(isset($roles) && count($roles) > 0)
                                            @foreach($roles as $role)
                                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ (is_array(old("roles")) && in_array($role->id, old("roles")) ? "checked" : "") }} /> {{$role->access_path}} <br/>
                                            @endforeach   
                                            @else 
                                                Ori e un bug nasol ori a picat serverul, dar e foarte posibil si sa fi uitat un ; pe undeva
                                            @endif 
                                                    
                                            </div>

                                            <br />
                                            <br />

                                            <button type="button" class="btn" id="refresh permissions" onclick="refreshPermissions()">Actualizeaza permisiuni</button>

                                        </div>  

                                        <div class="form-group">
                                            <label for="sort-order">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="{{ old('status') }}" >Alege</option>
                                                <option value="1" {{ (old("status") == 1 ? "selected" : "") }} >Activ</option>
                                                <option value="0" {{ (old('status') !== null && old("status") == 0 ? "selected" : "") }} >Inactiv</option>
                                            </select>
                                        </div>

                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-success">Salveaza modificarile</button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- .panel-body -->
                    </div> <!-- .hpanel -->
                </div>
            </div> <!-- .row -->
        </div> <!-- .content -->
    </div>


@endsection

@section('scripts')

    <script>

        function refreshPermissions(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/admin/refresh-roles',
                dataType: 'json',
                success: function (data) {
                    data = data['data'];
                    var html = '';

                    for(var i=0; i<data.length; i++){
                        html += '<input type="checkbox" name="roles[]" class="chkItem" value="'+ data[i].id + '"/> ' + data[i].access_path + ' <br />';
                    }
                    $("#access").html(html);
                    var html = '';
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }


    </script>

@endsection