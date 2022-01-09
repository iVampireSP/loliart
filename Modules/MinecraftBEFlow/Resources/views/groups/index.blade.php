@extends('layouts.app')

@section('title', tr('Groups'))

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Groups') }}</div>

    <div class="mdui-row mdui-p-b-2 mdui-p-l-1 mdui-m-t-2">
        <a class="mdui-btn mdui-btn-outlined mdui-ripple" onclick="m.create()">{{ tr('Create Group') }}</a>
    </div>

    <div class="pages">
        <div class="groups">
            <div class="mdui-table-fluid">
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ tr('Name') }}</th>
                            <th>{{ tr('Servers') }}</th>
                            <th>{{ tr('Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody class="mdui-typo">
                        @foreach ($groups as $group)
                            <tr id="group-{{ $group->id }}">
                                <td nowrap>{{ $group->id }}</td>
                                <td nowrap><a href="{{ route('minecraftBeFlow.groups.show', $group->id) }}">{{ $group->name }}</a></td>
                                <td nowrap>{{ $group->servers }}</td>
                                <td nowrap>
                                    <button onclick="m.delete({{ $group->id }})" class="mdui-btn mdui-btn-icon">
                                        <i class="material-icons mdui-icon">delete</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $groups->links() }}
    </div>

    <script>
        m = {
            create: () => {
                ui.prompt('The group name you want.', (val) => {
                    util.post(route('minecraftBeFlow.groups.store'), {
                        name: val
                    })
                })
            },
            delete: (id) => {
                ui.confirm('All servers in these group will be changed group to null.', () => {
                    util.delete(route('minecraftBeFlow.groups.destroy', id))
                })
            }
        }
    </script>

@endsection
