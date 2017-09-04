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
                    <h2 class="font-light m-b-xs">Utilizatori</h2>
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

                                    <form action="{{ URL::to('/admin/accounts/'.$user->id) }}" method="POST">

                                        <div class="form-group">
                                            <label for="name">Nume de utilizator: </label>
                                            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
                                            <p style="color:red">{{  $errors->first('username') }}</p>
                                        </div>

                                        <button type="button" id="reset" onclick="resetPass()" class="btn">Apasa pentru a reseta parola</button>

                                        <div class="form-group">
                                            <label for="name">Email: </label>
                                            <input type="email" name="mail" id="mail" class="form-control" value="{{ $user->mail }}" required>
                                            <p style="color:red">{{  $errors->first('mail') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Numar de telefon: </label>
                                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
                                            <p style="color:red">{{  $errors->first('phone') }}</p>
                                        </div>


                                        <div class="form-group">
                                            <label for="name">Adresa: </label>
                                            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
                                            <p style="color:red">{{  $errors->first('address') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Data nasterii: </label>
                                            <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ $user->birth_date }}" required>
                                            <p style="color:red">{{  $errors->first('birth_date') }}</p>
                                        </div>                                           

                                        <div class="form-group">
                                            <label for="group">Grup de utilizatori:</label>
                                            <select name="group_id" id="group_id" class="form-control">
                                                <option value="">Choose</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}" {{ ($user->group_id == $group->id) ? 'selected' : ''}} >{{ $group->group_name }}</option>
                                                @endforeach
                                            </select>
                                            <p style="color:red">{{  $errors->first('group_id') }}</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="sort-order">Status:</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Alege</option>
                                                <option value="1" {{ ($user->status == 1 ? 'selected' : '') }} >Activ</option>
                                                <option value="0" {{ ($user->status == 0 ? 'selected' : '') }} >Inactiv</option>
                                            </select>
                                            <p style="color:red">{{  $errors->first('status') }}</p>
                                        </div>

                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-success">Editeaza Utilizatorul</button>
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

        var a = 0;

        @if(old('password'))
            resetPass();
        @endif
        
        function resetPass(){
            a++;
            if(a%2==1){
            var html = '<div id="password" class="form-group"><label for="slug">Parola: </label><input type="password" name="password" class="form-control" required value={{ old('password') }} ><p style="color:red">{{  $errors->first('password') }}</p></div><div id="password_check" class="form-group"><label for="slug">Repeta Parola: </label><input type="password" name="password_check" class="form-control" required value={{ old('password_check') }} ><p style="color:red">{{  $errors->first('password_check') }}</p></div>';

            $('#reset').after(html);
            document.getElementById('reset').innerHTML = 'M-am razgandit';
            }
            else{
                document.getElementById('reset').innerHTML = 'Apasa pentru a reseta parola';
                $('#password').remove();
                $('#password_check').remove();
            }
        }

    </script>

@endsection