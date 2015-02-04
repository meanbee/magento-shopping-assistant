Magento Shopping Assistant 
================

TogetherJS-based Shopping Assistant


##Aim

To allow store admin to assist customers through the shopping process.  Performing the traditional role of store assistant like they would in the physical world. 


##Requirements

- Customer can request a shopping assistant with a button
- Admin can see a list of customers that have requested help. 
- Admin can join customer in a new tab
- Admin can view customer information if the customer is logged in. 
- Customer can end a session with an admin so that they can enter personal information comforted that the admin cannot see it. 
- We can ignore forms as part of the JS initialisations
- Pass in customer name from the logged in user if possible. 



##Assumptions

- Shopping Assistants do not make modifications to basket.
    - POSTS happen on the persons machine.

##Known Issues 

- The customer could see the catalog in a different state than the admin, e.g. different prices due to price rules being applied
- TURN server not provided by Mozilla, would need to set one up. 
~
~
