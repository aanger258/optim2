@extends('partials.layout')

@section('content')

<div id="wrapper">
<div id="content">
            <div class="normalheader transition animated fadeIn">
                <div class="hpanel">
                    <div class="panel-body" style="padding: 10px 17px">
                        
    <div class="row">
        <div class="col-md-12">

            
            <div class="box box-primary">

                @if(Session::has('alert-success'))

                <p class="alert alert-success"> {{ Session::get('alert-success') }} </p>
                
                @endif

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


                <form role="delete" action="{{URL::to('/admin/user-groups/delete')}}" method="post">
                    <div class="box-header with-border pull-right" style="margin-bottom:20px;">
                        <a href="{{ URL::to('/admin/user-groups/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adauga</a>
                        <button type="submit" id="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete theese groups? It will also delete all the users associated and all the info of that users')"><i class="fa fa-remove"></i> Sterge</button>
                    </div>

                    <div class="box-body" style="clear:both;">
                        @if(isset($userGroups) && count($userGroups) > 0)
                        <table id="pages" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Nume</th>
                                <th>Status</th>
                                <th>Creat in data de</th>
                                <th>Ultima oara modificat in data de</th>
                                <th width="50">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userGroups as $group)
                                <tr>
                                    <td width="10"><input type="checkbox" name="id[]" value="{{ $group->id }}"></td>
                                    <td>{{ $group->group_name }}</td>
                                    @if($group->status == 1)
                                    <td>
                                        <span class="label label-success">Activ</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="label label-danger">Inactiv</span>
                                    </td>
                                    @endif
                                    <td>{{ $group->created_at }}</td>
                                    <td>{{ $group->updated_at    }}</td>
                                    <td class="text-center"><a href="{{ URL::to('/admin/user-groups/'.$group->id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else

                            Momentan nu exista grupuri de utilizatori pe care sa le poti modifica.

                        @endif
                    </div>

                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>

                {{ $userGroups->links() }}

            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection