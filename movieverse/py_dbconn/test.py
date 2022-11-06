
def listToString(str_list):
    result = ""
    for s in str_list:
        result += s + "/"
    return result.strip()


str_list = ['Johnny Depp', 'Orlando Bloom', 'Keira Knightley', 'Geoffrey Rush', 'Jack Davenport']
result = listToString(str_list)
print(result)