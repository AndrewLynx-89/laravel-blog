<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route'	=>	['users.update', $user->id],
        'method'	=>	'put',
        'files'	=>	true
    ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Имя')}}
                        {{Form::text('name', $user->name, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Имя'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Email')}}
                        {{Form::text('email', $user->email, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Email'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Пароль')}}
                        {{Form::password('password',['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Password'])}}
                    </div>
                    <div class="form-group">
                        <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
                        {{Form::label('exampleInputEmail1', 'Аватар')}}
                        {{Form::file('avatar',['id' => 'exampleInputFile'])}}
                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
    <!-- /.content -->
</div>