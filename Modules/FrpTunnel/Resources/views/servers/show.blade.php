@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', $server->name)

@section('content')
    <h1 class="mdui-typo-display-1">{{ $server->name }}</h1>

    @php($serverInfo = (object) (new \Modules\FrpTunnel\Http\Controllers\FrpController($server->id))->serverInfo())

    <div class="mdui-tab" mdui-tab>
        <a href="#infomations" class="mdui-ripple">{{ tr('Information') }}</a>
        <a href="#configuration" class="mdui-ripple">{{ tr('Basic Configuration') }}</a>
        <a href="#delete" class="mdui-ripple">{{ tr('Delete') }}</a>
    </div>

    <div id="infomations">
        <div class="mdui-typo-headline mdui-m-t-2">{{ tr('Server Details') }}</div>
        <div class="mdui-table-fluid mdui-m-t-2">
            <table class="mdui-table mdui-table-hoverable">
                <tbody class="mdui-typo">
                    <tr>
                        <td>Frps {{ tr('Version') }}</td>
                        <td>{{ $serverInfo->version }}</td>
                    </tr>
                    <tr>
                        <td>{{ tr('Bind Port') }}</td>
                        <td>{{ $serverInfo->bind_port }}</td>
                    </tr>

                    @if ($serverInfo->bind_udp_port)
                        <tr>
                            <td>{{ tr('Bind UDP Port') }}</td>
                            <td>{{ $serverInfo->bind_udp_port }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>{{ tr('HTTP Port') }}</td>
                        <td>{{ $serverInfo->vhost_http_port }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('HTTPS Port') }}</td>
                        <td>{{ $serverInfo->vhost_https_port }}</td>
                    </tr>

                    <tr>
                        <td>KCP {{ tr('Bind Port') }}</td>
                        <td>{{ $serverInfo->kcp_bind_port }}</td>
                    </tr>

                    @if (!empty($serverInfo->subdomain_host))
                        <tr>
                            <td>{{ tr('Subdomain host') }}</td>
                            <td>{{ $serverInfo->subdomain_host }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>{{ tr('Max PoolCount') }}</td>
                        <td>{{ $serverInfo->max_pool_count }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Max Ports Peer Client') }}</td>
                        <td>{{ $serverInfo->max_ports_per_client }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Heartbeat timeout') }}</td>
                        <td>{{ $serverInfo->heart_beat_timeout }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Total traffic in') }}</td>
                        <td>{{ $serverInfo->total_traffic_in }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Total traffic out') }}</td>
                        <td>{{ $serverInfo->total_traffic_out }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Client counts') }}</td>
                        <td>{{ $serverInfo->client_counts }}</td>
                    </tr>

                    <tr>
                        <td>{{ tr('Current connections counts') }}</td>
                        <td>{{ $serverInfo->cur_conns }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div id="configuration">
        <x-lock for="update" />

        <div class="mdui-row mdui-m-t-2">
            <form action="#" id="new" onsubmit="event.preventDefault();m.update($(this))" data-lock-form="update">
                <div class="mdui-col-md-6 mdui-col-sm-12">
                    <div class="mdui-typo-headline">{{ tr('Server Configuration') }}</div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
                        <input class="mdui-textfield-input" type="text" name="name" value="{{ $server->name }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Server Address') }}</label>
                        <input class="mdui-textfield-input" type="text" name="server_address"
                            value="{{ $server->server_address }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Server Port') }}</label>
                        <input class="mdui-textfield-input" type="text" name="server_port"
                            value="{{ $server->server_port }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Server Token') }}</label>
                        <input class="mdui-textfield-input" type="text" name="token" value="{{ $server->token }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Dashboard Port') }}</label>
                        <input class="mdui-textfield-input" type="text" name="dashboard_port"
                            value="{{ $server->dashboard_port }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Dashboard User') }}</label>
                        <input class="mdui-textfield-input" type="text" name="dashboard_user"
                            value="{{ $server->dashboard_user }}" />
                    </div>

                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <label class="mdui-textfield-label">{{ tr('Dashboard Password') }}</label>
                        <input class="mdui-textfield-input" type="text" name="dashboard_password"
                            value="{{ $server->dashboard_password }}" />
                    </div>

                </div>

                <div class="mdui-col-md-6 mdui-col-sm-12">
                    <div class="mdui-row">
                        <div class="mdui-col-md-6 mdui-col-sm-6">
                            <div class="mdui-typo-headline">{{ tr('Features') }}</div>

                            <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow HTTP') }}</div>
                            <label class="mdui-switch">
                                <input type="checkbox" name="allow_http" value="1" @if ($server->allow_http) checked @endif />
                                <i class="mdui-switch-icon"></i>
                            </label>

                            <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow HTTPS') }}</div>
                            <label class="mdui-switch">
                                <input type="checkbox" name="allow_https" value="1" @if ($server->allow_https) checked @endif />
                                <i class="mdui-switch-icon"></i>
                            </label>

                            <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow TCP') }}</div>
                            <label class="mdui-switch">
                                <input type="checkbox" name="allow_tcp" value="1" @if ($server->allow_tcp) checked @endif />
                                <i class="mdui-switch-icon"></i>
                            </label>

                            <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow UDP') }}</div>
                            <label class="mdui-switch">
                                <input type="checkbox" name="allow_udp" value="1" @if ($server->allow_udp) checked @endif />
                                <i class="mdui-switch-icon"></i>
                            </label>

                            <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow STCP') }}</div>
                            <label class="mdui-switch">
                                <input type="checkbox" name="allow_stcp" value="1" @if ($server->allow_stcp) checked @endif />
                                <i class="mdui-switch-icon"></i>
                            </label>
                        </div>

                        <div class="mdui-col-md-6 mdui-col-sm-6">
                            <div class="mdui-typo-headline">{{ tr('Limit') }}</div>

                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label">{{ tr('HTTP Port') }}</label>
                                <input class="mdui-textfield-input" type="text" name="http_port"
                                    value="{{ $server->http_port }}" />
                            </div>

                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label">{{ tr('HTTPS Port') }}</label>
                                <input class="mdui-textfield-input" type="text" name="https_port"
                                    value="{{ $server->https_port }}" />
                            </div>

                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label">{{ tr('Min Port') }}</label>
                                <input class="mdui-textfield-input" type="text" name="min_port"
                                    value="{{ $server->min_port }}" />
                            </div>

                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label">{{ tr('Max Port') }}</label>
                                <input class="mdui-textfield-input" type="text" name="max_port"
                                    value="{{ $server->max_port }}" />
                            </div>

                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <label class="mdui-textfield-label">{{ tr('Max Tunnels') }}</label>
                                <input class="mdui-textfield-input" type="text" name="max_tunnels"
                                    value="{{ $server->max_tunnels }}" />
                            </div>

                            <button class="mdui-btn mdui-ripple mdui-btn-outlined"
                                type="submit">{{ tr('Update Server') }}</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="delete">
        <button class="mdui-btn mdui-ripple mdui-btn-outlined mdui-m-t-2"
            onclick="event.preventDefault();m.delete()">{{ tr('Delete Server') }}</button>
    </div>

    <script>
        m = {
            update: (ele) => {
                let arr = $(ele).serializeArray();
                util.put(route('frpTunnel.servers.update', {{ $server->id }}), arr)
            },
            delete: () => {
                util.delete(route('frpTunnel.servers.destroy', {{ $server->id }}))
            },
        }
    </script>
@endsection
