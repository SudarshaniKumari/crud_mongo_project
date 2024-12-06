// In public/assets/js/passkey.js (example file path)
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.querySelector('#registerPasskey').addEventListener('click', async () => {
    try {
        // Fetch challenge from the server
        const response = await fetch('/passkey/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        // Handle response
        if (!response.ok) {
            throw new Error('Failed to fetch registration challenge.');
        }

        const options = await response.json();

        // WebAuthn API
        const credential = await navigator.credentials.create({ publicKey: options });

        const verifyResponse = await fetch('/passkey/verify', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                clientData: credential.response.clientDataJSON,
                attestationObject: credential.response.attestationObject,
            }),
        });

        if (verifyResponse.ok) {
            alert('Passkey registered successfully!');
        } else {
            alert('Failed to register passkey.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred during registration.');
    }
});
