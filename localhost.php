<script>

let data = localStorage.getItem('brand')
data = JSON.parse(data)
if (data){


data.map(item => {
  item.map(item => {
    document.write(item.brand, ' ', 
    item.year,' ', 
                  
                  '<br>')
  })
})
} else document.write('Пусто')

</script>