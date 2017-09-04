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


                <form role="delete" action="{{URL::to('/admin/accounts/delete')}}" method="post">
                    <div class="box-header with-border pull-right" style="margin-bottom:20px;">
                        <a href="{{ URL::to('/admin/accounts/create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Adauga</a>
                        <button type="submit" id="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the selected users? It will also delete all the data associated to them')"><i class="fa fa-remove"></i> Sterge</button>
                    </div>

                    <div class="box-body" style="clear:both;">
                    @if(isset($users) && count($users) > 0)
                        <table id="users" class="table table-bordered table-striped dataTable">
                            <thead>
                            <tr>
                                <th width="10">#</th>
                                <th>Nume de utilizator</th>
                                <th>Mail</th>
                                <th>Telefon</th>
                                <th>Grup</th>
                                <th>Status</th>
                                <th width="50">Actiune</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td width="10"><input type="checkbox" name="id[]" value="{{ $user->id }}"></td>
                                    <?php $d1 = new DateTime($user->birth_date); $d2 = new DateTime(date('Y-m-d'));$diff = $d2->diff($d1); ?>
                                    <td>{{ $user->username }} ( {{ $diff->y }} ani)</td>
                                    <td>{{ $user->mail }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->groupName->group_name }}</td>
                                    @if($user->status == 1)
                                    <td>
                                        <span class="label label-success">Activ</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="label label-danger">Inactiv</span>
                                    </td>
                                    @endif
                                    <td class="text-center"><a href="{{ URL::to('/admin/accounts/'.$user->id.'/edit')}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                </tr>
                            @endforeach
    
                            </tbody>
                        </table>
                    @else
                        
                        Nu exista utilizatori in baza de date.

                    @endif
                    </div>

                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>

                {{ $users->links() }}
            </div>

        </div><!-- /.col -->
    </div><!-- /.row -->

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection