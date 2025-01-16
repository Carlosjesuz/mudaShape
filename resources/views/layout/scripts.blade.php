<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"
    integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg=="
    crossorigin="anonymous"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    AOS.init();
    $(document).ready(function(){
        $('#formContato').submit(function(e){
            e.preventDefault(); 

            var formData = $(this).serialize();

            console.log(formData);
    
            $.ajax({
                url: '{{ route("contato.send") }}', 
                type: 'POST',
                data: formData,
                success: function(response){
                    console.log('Resposta do servidor:', response);
                    $('#name').val("");
                    $('#email').val("");
                    $('#fone').val("");
                    $('#date').val("");
                    $('#cpf').val("");
                    $('#password').val("");
                    $('#password_confirmation').val("");
                },
                error: function(xhr, status, error){
                    console.error('Erro na chamada AJAX:', error);
                    $('#erro').css({'display': 'flex'});
                }
            });
        });
    });
</script>
@yield('script')
@stack('script')
