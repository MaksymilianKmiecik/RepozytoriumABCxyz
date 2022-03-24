const tab=document.querySelector('[data-tab-target]')


tab.addEventListener('click', ()=>
{
    
    const target=document.querySelector(tab.dataset.tabTarget)
    
    if (target.classList.contains('active')) {
        target.classList.remove('active');
    }else
    {

        target.classList.add('active');
        let active=1;
    }
})    


