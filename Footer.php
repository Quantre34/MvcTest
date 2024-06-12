
<script type="text/javascript">
	         
            $(document).ready(function(){
                /*
                   
                */
                $('form').on('submit', function(e){
                    let $this = $(this);
                    if ($this.attr('action')=='ajax') {
                        let target = $this.attr('target');
                        let callback = $this.attr('callback');
                        let formData = new FormData(this);
                        formData.append('action', target);
                        if($this.hasAttr('callback')){
                          formData.append('callback', $this.attr('callback'));
                        }
                        if($this.hasAttr('NoAlert')){
                          formData.append('NoAlert', true);
                        }
                        $.ajax({
                          type: $this.attr('method'),
                          url: '/ajax',
                          cache: false,
                          processData: false,
                          datatype: 'json',
                          contentType: false,
                          data: formData,
                          success: function(data){
                            console.log(data);
                            data = JSON.parse(data);
                            if (data['outcome']) {
                              if (!data['NoAlert']) {
                                  Swal.fire('İşlem başarıyla tamamlandı', (data['Message']?? ''), 'success').then((result)=>{
                                    if (data['route']) {
                                        window.location = data['route'];
                                    }
                                  });
                              }else {
                                if (data['route']) {
                                      window.location = data['route'];
                                }
                              }
                            }else {
                                if (!data['NoAlert']) {
                                    Swal.fire('Bir şeyler ters gitti!', data['ErrorMessage'], 'error').then((result)=>{
                                      if (data['route']) {
                                          window.location = data['route'];
                                      }
                                      if (data['tag']) {
                                          $('input[name='+data['tag']+']').css('border', '1px solid red');
                                          $('select[name='+data['tag']+']').css('border', '1px solid red');
                                          $('textarea[name='+data['tag']+']').css('border', '1px solid red');
                                      }
                                    });
                                }
                            }
                          },
                          error: function(){
                            window.location.reload();
                          }
                        });
                        return false;
                    }
                    console.log($this);
                  });
                  ///
                $.fn.hasAttr = function(name){
                  return this.attr(name) !== undefined;
                }

            });
</script>