@extends('layouts.app')

@section('app-menu')
    @include('frptunnel::layouts.menu')
@endsection

@section('title', 'New Tunnel Servers')

@section('content')
    <h1 class="mdui-typo-display-1">{{ tr('New Tunnel Servers') }}</h1>

    <div class="mdui-row mdui-m-t-5">
        <form action="#" id="new" onsubmit="event.preventDefault();m.create($(this))">
            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-typo-headline">{{ tr('Server Details') }}</div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Name') }}</label>
                    <input class="mdui-textfield-input" type="text" name="name" />
                    <div class="mdui-textfield-helper">{{ tr('Your server need a name.') }}</div>
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Address') }}</label>
                    <input class="mdui-textfield-input" type="text" name="server_address" />
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Port') }}</label>
                    <input class="mdui-textfield-input" type="text" name="server_port" />
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Server Token') }}</label>
                    <input class="mdui-textfield-input" type="text" name="token" />
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Dashboard Port') }}</label>
                    <input class="mdui-textfield-input" type="text" name="dashboard_port" />
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Dashboard User') }}</label>
                    <input class="mdui-textfield-input" type="text" name="dashboard_user" />
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">{{ tr('Dashboard Password') }}</label>
                    <input class="mdui-textfield-input" type="text" name="dashboard_password" />
                </div>

            </div>

            <div class="mdui-col-md-6 mdui-col-sm-12">
                <div class="mdui-row">
                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-typo-headline">{{ tr('Features') }}</div>

                        <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow HTTP') }}</div>
                        <label class="mdui-switch">
                            <input type="checkbox" name="allow_http" value="1" />
                            <i class="mdui-switch-icon"></i>
                        </label>

                        <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow HTTPS') }}</div>
                        <label class="mdui-switch">
                            <input type="checkbox" name="allow_https" value="1" />
                            <i class="mdui-switch-icon"></i>
                        </label>

                        <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow TCP') }}</div>
                        <label class="mdui-switch">
                            <input type="checkbox" name="allow_tcp" value="1" />
                            <i class="mdui-switch-icon"></i>
                        </label>

                        <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow UDP') }}</div>
                        <label class="mdui-switch">
                            <input type="checkbox" name="allow_udp" value="1" />
                            <i class="mdui-switch-icon"></i>
                        </label>

                        <div class="mdui-typo-subheading mdui-m-t-2">{{ tr('Allow STCP') }}</div>
                        <label class="mdui-switch">
                            <input type="checkbox" name="allow_stcp" value="1" />
                            <i class="mdui-switch-icon"></i>
                        </label>
                    </div>

                    <div class="mdui-col-md-6 mdui-col-sm-6">
                        <div class="mdui-typo-headline">{{ tr('Limit') }}</div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('HTTP Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="http_port" value="80" />
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('HTTPS Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="https_port" value="443" />
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Min Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="min_port" value="10000" />
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Max Port') }}</label>
                            <input class="mdui-textfield-input" type="text" name="max_port" value="60000" />
                        </div>

                        <div class="mdui-textfield mdui-textfield-floating-label">
                            <label class="mdui-textfield-label">{{ tr('Max Tunnels') }}</label>
                            <input class="mdui-textfield-input" type="text" name="max_tunnels" value="100" />
                        </div>

                        <button class="mdui-m-t-4 mdui-btn mdui-ripple mdui-btn-outlined"
                            type="submit">{{ tr('Create Server') }}</button>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        m = {
            create: (ele) => {
                let arr = $(ele).serializeArray();
                util.post(route('frpTunnel.servers.store'), arr)
            }
        }
    </script>
@endsection
