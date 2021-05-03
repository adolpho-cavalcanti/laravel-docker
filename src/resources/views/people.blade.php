<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
          <div class="col-sm text-center">
            <form action="{{route('setEditar')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="row">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="Informe o nome do Usuário" />
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Informe o email do Usuário" />
                    <label>Senha:</label>
                    <input type="password" class="form-control" name="password" value="" placeholder="Informe a senha do Usuário" />
                    <label>Categoria:</label>
                    <select class="form-control" name="category">
                        <option value="">SELECIONE</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" <?php if(old('category') == $category->id){echo 'selected=selected';}?>>
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary" style="margin: 10px 0">SALVAR</button>
                </div>
            </form>

          </div>
        </div>
</x-app-layout>
