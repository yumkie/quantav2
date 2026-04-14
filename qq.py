def metod_yakobi_dlya_slau(matrica_koefficientov, vektor_pravoy_chasti,
                           zhelaemaya_tochnost=1e-6, maksimum_iteraciy=100):
    """
    Reshaet sistemu lineynykh uravneniy A·x = b metodom Yakobi (prostoy iteracii).

    Argumenty:
        matrica_koefficientov (list of list) : kvadratnaya matrica A
        vektor_pravoy_chasti (list)          : vektor b
        zhelaemaya_tochnost (float)          : ostanovka, esli max|x_new - x_old| < tochnost
        maksimum_iteraciy (int)              : ogranichenie chisla shagov

    Vozvrashchaet:
        (priblizhennoe_reshenie, chislo_vypolnennykh_iteraciy)
    """
    razmernost_sistemy = len(vektor_pravoy_chasti)

    # Nachalnoe priblizhenie — vektor iz nuley
    tekushchee_priblizhenie = [0.0] * razmernost_sistemy

    for nomer_iteracii in range(maksimum_iteraciy):
        # Zdes budem sobirat novoe (utochnennoe) priblizhenie
        novoe_priblizhenie = [0.0] * razmernost_sistemy

        # Vychislyaem kazhduyu komponentu novogo vektora nezavisimo
        for indeks_stroki in range(razmernost_sistemy):
            # Summa proizvedeniy koefficientov na "starye" znacheniya ostalnykh peremennykh
            summa_ostalnykh_slagaemykh = 0.0

            for indeks_stolbca in range(razmernost_sistemy):
                if indeks_stroki != indeks_stolbca:
                    summa_ostalnykh_slagaemykh += (
                        matrica_koefficientov[indeks_stroki][indeks_stolbca]
                        * tekushchee_priblizhenie[indeks_stolbca]
                    )

            # Formula Yakobi: x_i^(novoe) = (b_i - summa_ostalnykh) / diagonalny_element
            diagonalny_element = matrica_koefficientov[indeks_stroki][indeks_stroki]
            novoe_priblizhenie[indeks_stroki] = (
                (vektor_pravoy_chasti[indeks_stroki] - summa_ostalnykh_slagaemykh)
                / diagonalny_element
            )

        # Maksimalnoe izmenenie mezhdu starym i novym priblizheniem
        maksimalnoe_izmenenie = max(
            abs(novoe_priblizhenie[i] - tekushchee_priblizhenie[i])
            for i in range(razmernost_sistemy)
        )

        # Gotovimsya k sleduyushchemu shagu
        tekushchee_priblizhenie = novoe_priblizhenie

        # Proverka na dostizhenie nuzhnoy tochnosti
        if maksimalnoe_izmenenie < zhelaemaya_tochnost:
            return tekushchee_priblizhenie, nomer_iteracii + 1

    # Esli tochnost ne dostignuta za maksimum_iteraciy
    return tekushchee_priblizhenie, maksimum_iteraciy


# --------------------- Primer ispolzovaniya ---------------------
if __name__ == "__main__":
    # Sistema:
    # 4x +  y +  z = 6
    #  x + 5y +  z = 7
    #  x +  y + 3z = 5
    A = [
        [4.0, 1.0, 1.0],
        [1.0, 5.0, 1.0],
        [1.0, 1.0, 3.0]
    ]
    b = [6.0, 7.0, 5.0]

    print("=== Reshenie SLAU metodom Yakobi ===")
    print("Matrica A:")
    for stroka in A:
        print("  ", stroka)
    print("Vektor b:", b)
    print()

    reshenie, iteraciy = metod_yakobi_dlya_slau(A, b, zhelaemaya_tochnost=1e-8)

    print(f"Reshenie polucheno za {iteraciy} iteraciy.")
    print("Naydennyy vektor x =", [round(komponenta, 8) for komponenta in reshenie])

    # Ruchnaya proverka: A·x dolzhno byt ravno b
    proverka = [0.0] * len(b)
    for i in range(len(A)):
        proverka[i] = sum(A[i][j] * reshenie[j] for j in range(len(reshenie)))
    print("Proverka A·x =", [round(znachenie, 8) for znachenie in proverka])