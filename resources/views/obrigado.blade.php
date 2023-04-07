<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <title>PerfecPay</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-indigo-50 md:py-2 md:px-64">
        <div class="container mx-auto bg-white shadow rounded p-4">
            <div>
                <img src="logo-original.png" alt="" srcset="">
            </div>
            <div class="mt-8 container mx-auto">
                <div class="grid md:grid-cols-3 bg-green-100 p-4 rounded shadow">
                    <div class="h-40 w-40">
                        <svg fill="#26a269" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16 0c-8.836 0-16 7.163-16 16s7.163 16 16 16c8.837 0 16-7.163 16-16s-7.163-16-16-16zM16 30.032c-7.72 0-14-6.312-14-14.032s6.28-14 14-14 14 6.28 14 14-6.28 14.032-14 14.032zM22.386 10.146l-9.388 9.446-4.228-4.227c-0.39-0.39-1.024-0.39-1.415 0s-0.391 1.023 0 1.414l4.95 4.95c0.39 0.39 1.024 0.39 1.415 0 0.045-0.045 0.084-0.094 0.119-0.145l9.962-10.024c0.39-0.39 0.39-1.024 0-1.415s-1.024-0.39-1.415 0z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="md:col-span-2 text-center">
                        <h1 class="text-xl">Sua compra foi realizada com sucesso</h1>
                        <h1 class="text-xl">Obrigado!</h1>
                        <div x-data>
                            @if (!empty($id))
                                <span>Cartão de crédito transação número: {{ $id }}</span>
                            @else
                                <button x-on:click="location=('{{ $url }}')"
                                    class="bg-blue-600 p-3 rounded w-40 mt-3 text-white w-full" href="/cartao">GERAR BOLETO</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
