<style>
    .login-btn,
    .login-btn a {
        color: #ffffff !important;
        background-color: #624F82 !important;
        border-color: #624F82 !important;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 16px;
        width: 100%
    }
</style>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-1 py-2 font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 login-btn']) }}>
    {{ $slot }}
</button>
