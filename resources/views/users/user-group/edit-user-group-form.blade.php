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

                                    <form action="{{ URL::to('/admin/user-groups/'.$group->id) }}" method="POST">

                                        <div class="form-group">
                                            <label for="name">Nume de grup:</label>
                                            <input type="text" name="group_name" id="group_name" class="form-control" value="{{ $group->group_name or '' }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="group">Permisiuni de grup:</label>
                                            <div class="pre-scrollable" id="access">

                                            @if(isset($roles) && count($roles) > 0)
                                            @foreach($roles as $role)
                                                <input type="checkbox" @if(array_key_exists($role->id,$group_roles)) class="existing" checked @else name="roles[]" @endif value="{{ $role->id }}" /> {{$role->access_path}} <br/>
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
                                                <option value="">Alege</option>
                                                <option value="1" @if($group->status == 1) selected @endif >Activ</option>
                                                <option value="0" @if($group->status == 0) selected @endif>Inactiv</option>
                                            </select>
                                        </div>

                                        <input type="hidden" value="" id="existing" name="existing" />
                                        {{ method_field('PUT') }}
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

        function updateExisting(){

            var checkboxes = document.getElementsByClassName("existing");
            var i;
            var values = [];

            for(i=0; i<checkboxes.length; i++){
                if(checkboxes[i].checked === true)
                values.push(checkboxes[i].value);
            }

            values = JSON.stringify(values);
            var existing = document.getElementById('existing');
            existing.value = values;

        }

        updateExisting();

        $('.existing').change( function() {
            updateExisting();
        });


    </script>

@endsection