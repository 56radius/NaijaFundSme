def luhn_checksum(card_number):
    def digits_of(n):
        return [int(d) for d in str(n)]
    digits = digits_of(card_number)
    odd_digits = digits[-1::-2]
    even_digits = digits[-2::-2]
    checksum = 0
    checksum += sum(odd_digits)
    for d in even_digits:
        checksum += sum(digits_of(d*2))
    
    if checksum % 10 == 0:
        return True
    else:return False
    #return checksum % 10

#print('Valid') if luhn_checksum("4532015112830366")==0 else print('Invalid')

#vic = luhn_checksum(4532015112830366)
wis = luhn_checksum(5399412251481029)
print(wis)