# Laravel Package for wrapper of Agora API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tipoff/laravel-agora-api.svg?style=flat-square)](https://packagist.org/packages/tipoff/laravel-agora-api)
![Tests](https://github.com/tipoff/laravel-agora-api/workflows/Tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/tipoff/laravel-agora-api.svg?style=flat-square)](https://packagist.org/packages/tipoff/laravel-agora-api)

This is where your description should go. (API wrapper + video conferencing Vue component)

## Installation

Install the package via composer:

```bash
composer require tipoff/laravel-agora-api
```

You may publish the config file with the following command:
```bash
php artisan vendor:publish --tag=agora-config
```

Obtain an app ID and certificate from Agora at: `https://www.agora.io/en/`.

Add the following variables to your `.env` file. (Additional config variables are specified in the `agora` config file, but these are the minimum required to use the package.)

```
AGORA_APP_ID={id-obtained-from-Agora}
AGORA_APP_CERTIFICATE={certificate-obtained-from-Agora}
```

## Installing Optional Frontend Vue Resources

This package comes with a set of Vue components that you may use alongside the server-side functionality. **You do not have to use these components to use the server-side calls.** However, if you wish to use them, follow these steps to install and configure them in your application:

### Publish the Javascript Assets:

You may publish the assets with the following command:
```bash
php artisan vendor:publish --tag=agora-js
```

### Install JS Dependencies via NPM

```
npm install vue vuex agora-rtc-sdk laravel-echo
```

### Import and Initialize Vue and Vuex

Inside your `resources/js/app.js` file, add the code from the following sections:

```
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const app = new Vue({
    el: '#app'
});
```

### Register the Vue Components
```
import AgoraVideoDisplay from './vendor/laravel-agora-api/components/AgoraVideoDisplay.vue';
import AgoraUserList from './vendor/laravel-agora-api/components/AgoraUserList.vue';
import AgoraIncomingCallAlert from './vendor/laravel-agora-api/components/AgoraIncomingCallAlert.vue';
...
Vue.component('agora-video-display', AgoraVideoDisplay);
Vue.component('agora-user-list', AgoraUserList);
Vue.component('agora-incoming-call-alert', AgoraIncomingCallAlert);
```

### Register the Vuex Module

This package uses a Vuex module to store and mutate state related to its functionality. This gives you access to the state in any other components you may register if necessary.

```
import LaravelAgoraModule from './vendor/laravel-agora-api/modules/LaravelAgoraModule';
...
const store = new Vuex.Store({
    modules: {
        agora: LaravelAgoraModule
    }
})
```

Add the Vuex store to the `Vue` instance like so:

```
const app = new Vue({
    el: '#app',
    store: store
});
```

### Finishing Up Asset Registration

When you are finished adjusting your `app.js` file, it should look similar to this:

```
import Vue from 'vue';
import Vuex from 'vuex';
import LaravelAgoraModule from './vendor/laravel-agora-api/modules/LaravelAgoraModule';
import AgoraVideoDisplay from './vendor/laravel-agora-api/components/AgoraVideoDisplay.vue';
import AgoraUserList from './vendor/laravel-agora-api/components/AgoraUserList.vue';
import AgoraIncomingCallAlert from './vendor/laravel-agora-api/components/AgoraIncomingCallAlert.vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        agora: LaravelAgoraModule
    }
})

Vue.component('agora-video-display', AgoraVideoDisplay);
Vue.component('agora-user-list', AgoraUserList);
Vue.component('agora-incoming-call-alert', AgoraIncomingCallAlert);

const app = new Vue({
    el: '#app',
    store: store
});
```

### Set Up Broadcasting and Laravel Echo

Set up broadcasting for your application as detailed in the Laravel documentation at: `https://laravel.com/docs/broadcasting`.

### Transpile and Place Assets

Run `npm run dev` to transpile the assets. You may now use the Vue components within your Vue app like so:

```
<agora-video-display></agora-video-display>
<agora-user-list></agora-user-list>
<agora-incoming-call-alert></agora-incoming-call-alert>
```

### Updating Package Resources

After updating to a newer package version, use `php artisan vendor:publish --tag=agora-js --force` to make sure that updates to package resources are republished to your application's `resources` directory.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tipoff](https://github.com/tipoff)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
