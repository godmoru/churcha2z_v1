    <!-- Page Script  -->
    <?php
        $states = \App\State::all(); 
        $lgas = \App\Lga::all();            
    ?>
      var states = <?= json_encode($states); ?>;
      var lgas = <?= json_encode($lgas); ?>;

    //<!-- State & Lgas -->
         $("select[name=state]").on('change',function(){
            var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
                var options = '<option value="">Select LGA</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=lga]").replaceWith(select);
        });