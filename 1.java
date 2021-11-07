public static void aritmatika(){
    int a = 4, b = 3;
    int un, sn = 0;
    int awal = 3, akhir = 14;

    for(int i = awal; i <= akhir; i++){
        un = a + ((i-1) * b);
        System.out.println("Suku ke-" + i + " adalah " +un);
        sn+=un;
    }
    System.out.println("Jumlah : " +sn);
}