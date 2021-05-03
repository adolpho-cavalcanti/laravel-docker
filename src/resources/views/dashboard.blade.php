<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 50px;">
        @if(Auth::user()->category_id == 1)
            <div class="row">
                <div class="col-sm text-center">
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal-pessoas" style="width: 160px;">
                        <i class="fa fa-heart fa-5x"></i><br>
                        <span style="font-size: 24px">
                            <i class="fa fa-plus"></i>
                            Usuários
                        </span>
                    </button>
                </div>
            </div>
        @endif
        <div class="row" style="margin-top:40px;">
            <div class="col-sm">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->category->name}}</td>
                            @if(Auth::user()->category_id == 1)
                                <td class="d-flex">
                                    <a href="{{route('people', $user->id) }}">
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <form action="{{route('excluir')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>Sem autorização</td>
                            @endif
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            {{ $users->links() }}
        </div>
      </div>
    <!-- Modal Usuários -->
    <div class="modal fade" id="exampleModal-pessoas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" style="padding: 40px;">
                    <form id="cadForm">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                        <div class="row">
                            <label>Nome:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Informe o nome do Usuário" />
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Informe o email do Usuário" />
                            <label>Senha:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Informe a senha do Usuário" />
                            <label>Categoria:</label>
                            <select class="form-control" name="category" id="category">
                                <option value="">SELECIONE</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary" style="margin: 10px 0">SALVAR</button>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
              </div>
          </div>
      </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script>


        $('#cadForm').on('submit',function(event){
            var token = $("#token").val();
            $.ajax({
                url: '/dashboard/people',
                type: 'POST',
                method: 'POST',
                dataType: 'json',
                ContentType: 'application/json',
                headers: {'X-CSRF-TOKEN': token},
                data: {
                    '_token': token,
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'category': $('#category').val(),
                },
                success: function (response) {
                    var json = $.parseJSON(response);
                        console.log(json);
                }
            })
        });
    </script>
</x-app-layout>
