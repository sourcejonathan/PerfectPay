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
                            <span>CARTÃO DE CRÉDITO</span>
                        </div>
                        <form id="form-checkout">
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="payerFirstName">Número do
                                    Cartão</label>
                                <div id="form-checkout__cardNumber"
                                    class="border border-gray-600 rounded h-10 p-2 w-full">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">Validade</label>
                                    <div id="form-checkout__expirationDate"
                                        class="border border-gray-600 rounded h-10 p-2">
                                    </div>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">CVV</label>
                                    <div id="form-checkout__securityCode"
                                        class="border border-gray-600 rounded h-10 p-2">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="payerFirstName">Banco
                                    emissor</label>
                                <select id="form-checkout__issuer"
                                    class="border border-gray-600 rounded h-10 p-2 w-full"></select>
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700"
                                    for="payerFirstName">Parcelas</label>
                                <select id="form-checkout__installments"
                                    class="border border-gray-600 rounded h-10 p-2 w-full"></select>
                            </div>
                            <div class="w-full">
                                <label class="block font-medium text-sm text-gray-700" for="payerFirstName">Titular do
                                    cartão</label>
                                <input type="text" id="form-checkout__cardholderName"
                                    class="border border-gray-600 rounded h-10 p-2 w-full" />
                            </div>
                            <div class="grid md:grid-cols-6">
                                <div class="md:col-span-2">
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">Documento</label>
                                    <select id="form-checkout__identificationType"
                                        class="border border-gray-600 rounded h-10 p-2"></select>
                                </div>
                                <div class="md:col-span-4">
                                    <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">Número</label>
                                    <input type="text" id="form-checkout__identificationNumber"
                                        class="border border-gray-600 rounded h-10 p-2 w-full" />
                                </div>
                            </div>
                            <div class="w-full">
                                <label class="block font-medium text-sm text-gray-700"
                                        for="payerFirstName">E-mail</label>
                                <input type="email" id="form-checkout__cardholderEmail"
                                    class="border border-gray-600 rounded h-10 p-2 w-full" />
                            </div>
                            <div class="w-full">
                                <button class="bg-green-600 p-3 rounded mt-3 text-white w-full" type="submit">PAGAR</button>
                            </div>
                            
                            <progress value="0" class="progress-bar" hidden>Carregando...</progress>
                        </form>
                        <div class="w-full" x-data>                                    
                            <button x-on:click="location=('/boleto')" class="bg-blue-600 p-3 rounded mt-3 text-white w-full" href="/cartao">PAGAR COM BOLETO</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("TEST-2da1a4b3-6ce6-4044-b610-00718add9291");
        const cardForm = mp.cardForm({
            amount: "200",
            iframe: true,
            form: {
                id: "form-checkout",
                cardNumber: {
                    id: "form-checkout__cardNumber",
                    placeholder: "",
                },
                expirationDate: {
                    id: "form-checkout__expirationDate",
                    placeholder: "MM/AA",
                },
                securityCode: {
                    id: "form-checkout__securityCode",
                    placeholder: "",
                },
                cardholderName: {
                    id: "form-checkout__cardholderName",
                    placeholder: "",
                },
                issuer: {
                    id: "form-checkout__issuer",
                    placeholder: "Banco emissor",
                },
                installments: {
                    id: "form-checkout__installments",
                    placeholder: "Parcelas",
                },
                identificationType: {
                    id: "form-checkout__identificationType",
                    placeholder: "Tipo de documento",
                },
                identificationNumber: {
                    id: "form-checkout__identificationNumber",
                    placeholder: "",
                },
                cardholderEmail: {
                    id: "form-checkout__cardholderEmail",
                    placeholder: "",
                },
            },
            callbacks: {
                onFormMounted: error => {
                    if (error) return console.warn("Form Mounted handling error: ", error);
                    console.log("Form mounted");
                },
                onSubmit: event => {
                    event.preventDefault();

                    const {
                        paymentMethodId: payment_method_id,
                        issuerId: issuer_id,
                        cardholderEmail: email,
                        amount,
                        token,
                        installments,
                        identificationNumber,
                        identificationType,
                    } = cardForm.getCardFormData();

                    fetch("/api/process_payment", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            token,
                            issuer_id,
                            payment_method_id,
                            transaction_amount: Number(amount),
                            installments: Number(installments),
                            description: "LIVRO O CÓDIGO LIMPO",
                            payer: {
                                email,
                                identification: {
                                    type: identificationType,
                                    number: identificationNumber,
                                },
                            },
                        }),
                    }).then(response => response.json())
                        // .then(json => console.log(json))
                        .then(json => location='/obrigado/'+json['id']);
                    
                },
                onFetching: (resource) => {
                    console.log("Fetching resource: ", resource);

                    // Animate progress bar
                    const progressBar = document.querySelector(".progress-bar");
                    progressBar.removeAttribute("value");

                    return () => {
                        progressBar.setAttribute("value", "0");
                    };
                }
            },
        });
    </script>
</body>

</html>
