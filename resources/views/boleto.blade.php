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
                <div class="grid md:grid-cols-6 gap-3">
                    <div class="md:col-span-4">
                        <div class="grid md:grid-cols-6 gap-2">
                            <div class="md:col-span-2 shadow">
                                <img class="shadow" src="livro.jpeg" alt="" srcset="">
                            </div>
                            <div class="content-start md:col-span-4">
                                <h2 class="font-bold">Você está comprando</h2>
                                <div class="mt-12">
                                    <span>Livro: Código Limpo</span>
                                    
                                </div>
                                <div>
                                    <span>Valor: R$ 200,00</span>
                                </div>
                            </div>
                        </div>                                                
                    </div>
                    <div class="md:col-span-2 itens-center">
                        <div class="bg-green-100 rounded shadow p-3 text-center mb-3">
                            <span>BOLETO BANCÁRIO</span>
                        </div>
                        <form id="form-checkout" action="/api/process_payment_boleto" method="post">
                            <div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">Nome</label>
                                    <input id="form-checkout__payerFirstName" name="payerFirstName" type="text"
                                        class="border border-gray-600 rounded h-10 p-2">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerLastName">Sobrenome</label>
                                    <input id="form-checkout__payerLastName" name="payerLastName" type="text"
                                        class="border border-gray-600 rounded h-10 p-2">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="email">E-mail</label>
                                    <input id="form-checkout__email" name="email" type="text"
                                        class="border border-gray-600 rounded h-10 p-2">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="identificationType">Tipo
                                        de documento</label>
                                    <select id="form-checkout__identificationType" name="identificationType"
                                        type="text" class="border border-gray-600 rounded h-10 p-2"></select>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="identificationNumber">Número do documento</label>
                                    <input id="form-checkout__identificationNumber" name="identificationNumber"
                                        type="text" class="border border-gray-600 rounded h-10 p-2">
                                </div>
                            </div>

                            <div>
                                <div>
                                    <input type="hidden" name="transactionAmount" id="transactionAmount"
                                        value="200">
                                    <input type="hidden" name="description" id="description"
                                        value="LIVRO CÓDIGO LIMPO">
                                    <br>
                                    <button class="bg-green-600 p-3 rounded mt-3 text-white w-full" type="submit">GERAR BOLETO</button>
                                </div>
                                
                            </div>
                        </form>
                        <div x-data>                                    
                            <button x-on:click="location=('/cartao')" class="bg-blue-600 p-3 rounded w-24 mt-3 text-white w-full" href="/cartao">PAGAR COM CARTÃO</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("TEST-2da1a4b3-6ce6-4044-b610-00718add9291");

        (async function getIdentificationTypes() {
            try {
                const identificationTypes = await mp.getIdentificationTypes();
                const identificationTypeElement = document.getElementById('form-checkout__identificationType');

                createSelectOptions(identificationTypeElement, identificationTypes);
            } catch (e) {
                return console.error('Error getting identificationTypes: ', e);
            }
        })();

        function createSelectOptions(elem, options, labelsAndKeys = {
            label: "name",
            value: "id"
        }) {
            const {
                label,
                value
            } = labelsAndKeys;

            elem.options.length = 0;

            const tempOptions = document.createDocumentFragment();

            options.forEach(option => {
                const optValue = option[value];
                const optLabel = option[label];

                const opt = document.createElement('option');
                opt.value = optValue;
                opt.textContent = optLabel;

                tempOptions.appendChild(opt);
            });

            elem.appendChild(tempOptions);
        }
    </script>
</body>

</html>
