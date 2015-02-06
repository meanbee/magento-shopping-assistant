# Magento Shopping Assistant 


This magento extensions uses TogetherJS to create a virtual shopping assistant.  Provide customers with the ability to call over a virtual shopping asssistant. 

The store owner can then join the customer, follow them as they browse around the site, chat with text or voice (using WebRTC) and make suggestions.  

This is much more than a live chat client, it actually helps customers and sales advisors browse the site together and consider products.  A much closer representation to the physical store experience. 

## Demo

![Admin follows customer](docs/admin-follows-customer.png)![Admin welcomes customers](docs/admin-hello.png)![Admin joins shopping assistant session](docs/admin-join-session.png)![Admin joined session](docs/admin-joined-session.png)![Admin view of shopping assistant requests](docs/admin-list.png)![Admin offers product suggestion](docs/admin-product-suggesion.png)![Customer profile](docs/awaiting-assistant-profile.png)![Customer view of awaiting assistant](docs/awaiting-assistant.png)![Customer view of assistant arriving](docs/customer-assistant-arrived.png)![Customer follows admin link](docs/customer-follow-admin.png)![Customer requests assistance](docs/request-assistant.png)



## Assumptions

- Shopping Assistants cannot make modifications to the customer's basket as sessions are unique to the browser

## To Do

- The customer could see the catalog in a different state than the admin, e.g. different prices due to price rules being applied
- TURN server not provided by Mozilla so voice does not work out of the box.
- Assign request to a admin user.
- Use name and avatar of the assigned admin user when they join customer so that the setup process doesn't have to happen
