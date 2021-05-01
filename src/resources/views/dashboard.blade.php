<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 50px;">
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
                            <td>
                                <a href="{{route('people', $user->id) }}">
                                    <button class="btn btn-secondary">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger">
                                    <i class="fa fa-close"></i>
                                </button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
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
                    <form action="{{route('criar')}}" method="POST">
                        @csrf
                        <div class="row">
                            <label>Nome:</label>
                            <input type="text" class="form-control" placeholder="Informe o nome do Usuário" />
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Informe o email do Usuário" />
                            <label>Senha:</label>
                            <input type="password" class="form-control" placeholder="Informe a senha do Usuário" />
                            <label>Categoria:</label>
                            <select class="form-control">
                                @foreach ($users as $user)
                                    <option value="">SELECIONE</option>
                                    <option value="{{$user->category->id}}">{{$user->category->name}}</option>
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
</x-app-layout>
