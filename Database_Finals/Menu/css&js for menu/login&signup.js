     function showSignInForm() {
            document.getElementById('signInForm').style.display = 'block';
            document.getElementById('signUpForm').style.display = 'none';
        }

        function showSignUpForm() {
            document.getElementById('signInForm').style.display = 'none';
            document.getElementById('signUpForm').style.display = 'block';
        }

        function openModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }