export function useFileExtension(fileName) {
  return fileName.split('.').pop()
}

export function useGetCalculatedAge(calculated) {
  let year_num = calculated.y ? calculated.y : 0
  let month_num = calculated.m ? calculated.m : 0
  let day_num = calculated.d ? calculated.d : 0
  let y = calculated.y ? calculated.y.toString() + 'Y' : 0
  let m = calculated.m ? calculated.m.toString() + 'M' : 0
  let d = calculated.d ? calculated.d.toString() + 'D' : 0

  if (year_num > 3) {
    return y
  }

  if (month_num && !year_num && !day_num) {
    return m
  }

  if (year_num > 0 && month_num == 0 && day_num != 0) {
    return y + ', ' + d
  }
  if (year_num > 0 && month_num == 0 && day_num == 0) {
    return y
  }

  if (year_num > 0) {
    return y + ', ' + m
  }


  if (year_num > 0 && month_num > 0) {
    return m + ', ' + d
  }

  if (month_num > 0 && day_num > 0) {
    return m + ', ' + d
  }

  return d
}