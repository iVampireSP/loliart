@extends('layouts.app')

@section('title', $server->name)

@section('app-menu')
    @include('minecraftbeflow::layouts.menu')
@endsection

@section('content')
    <div class="mdui-typo-display-1 server-name">{{ $server->name }}</div>

    <div class="mdui-tab mdui-m-b-2" mdui-tab>
        <a href="#infomations" class="mdui-ripple">{{ tr('Information') }}</a>
        <a href="#players" class="mdui-ripple">{{ tr('Online Players') }}</a>
        <a href="#configuration" class="mdui-ripple">{{ tr('Basic Configuration') }}</a>
        <a href="#delete" class="mdui-ripple">{{ tr('Delete') }}</a>
    </div>

    <div id="infomations">
        @if ($server->status === 'pending')
            <p>Your server need active, please download "EdgeFlow.lxl.js" to your plugins folder, then restart server.
            </p>
        @else
            @php($cache = cache('mcbe_flow_server_' . $server->id, 0))
            @if (!$cache)
                Server offline
            @else
                version: {{ $cache['version'] ?? 0 }}
            @endif
            {{-- @if (cache()) --}}
        @endif
    </div>
    <div id="players">
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ tr('Name') }}</th>
                        <th>{{ tr('Position') }}</th>
                        <th>{{ tr('Game mode') }}</th>
                        <th>{{ tr('Health') }}</th>
                    </tr>
                </thead>
                <tbody id="player_list">

                </tbody>
            </table>
        </div>

    </div>


    <div id="configuration">
        <form onsubmit="event.preventDefault();m.update(this)">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
                <input class="mdui-textfield-input" type="text" name="name" value="{{ $server->name }}"
                    oninput="$('.server-name').text(this.value)" />
                <div class="mdui-textfield-helper">{{ tr('Your server name.') }}</div>
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">{{ tr('Server IP') }}</label>
                <input class="mdui-textfield-input" type="text" name="ip" value="{{ $server->ip }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">{{ tr('Server Port') }}</label>
                <input class="mdui-textfield-input" type="text" name="port" value="{{ $server->port }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Start X</label>
                <input class="mdui-textfield-input" type="text" name="start_x" value="{{ $server->start_x }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">End X</label>
                <input class="mdui-textfield-input" type="text" name="end_x" value="{{ $server->end_x }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Start Z</label>
                <input class="mdui-textfield-input" type="text" name="start_z" value="{{ $server->start_z }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">End Z</label>
                <input class="mdui-textfield-input" type="text" name="end_z" value="{{ $server->end_z }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Motd</label>
                <input class="mdui-textfield-input" type="text" name="motd" value="{{ $server->motd }}" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Token</label>
                <input class="mdui-textfield-input" type="text" value="{{ $server->token }}" readonly />
            </div>

            <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
                type="submit">{{ tr('Update Server') }}</button>
        </form>

    </div>

    <div id="delete">
        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
            onclick="m.delete()">{{ tr('Delete Server') }}</button>
    </div>

    <script>
        m = {
            update: (ele) => {
                util.put(route('minecraftBeFlow.servers.update', {{ $server->id }}), $(ele).serializeArray())
            },
            delete: () => {
                ui.confirm('Are you sure to delete the MCBE server ?', () => {
                    util.delete(route('minecraftBeFlow.servers.destroy', {{ $server->id }}))
                })
            },
            e: (type, data) => {
                switch (type) {
                    case 'minecraftBeFlow.server.updated':
                        let html = ``;
                        for (i in data.players) {
                            let pl = data.players[i]
                            let current = ++i
                            html += `<tr>
                                        <td>${current}</td>
                                        <td>${pl.name}</td>
                                        <td>${pl.pos[0]},${pl.pos[1]},${pl.pos[2]}</td>
                            `;

                            let gm;

                            switch (pl.gameMode) {
                                case 0:
                                    gm = 'Survival';
                                    break;

                                case 1:
                                    gm = 'Creative';
                                    break;

                                case 2:
                                    gm = 'Adventure';
                                    break;

                                default:
                                    gm = 'Unknown'
                                    break;

                            }

                            html += `
                                <td>${gm}</td>
                                <td>${pl.maxHealth}/${pl.health}</td>
                            </tr>`
                        }

                        $('#player_list').html(html);

                        break;
                }
            },
        };

        m.e('minecraftBeFlow.server.updated', {!! json_encode($cache) !!})
    </script>


@endsection
