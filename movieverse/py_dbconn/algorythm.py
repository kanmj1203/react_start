#Select Sort
from typing import MutableSequence

def Select_sort(data: MutableSequence):
	num = len(data)
	for i in range(num):
		min = i
		for j in range(i + 1, num):
			if data[j] < data[min]:
				min = j
		data[i], data[min] =  data[min], data[i]
		#print(data[ : i+1])
