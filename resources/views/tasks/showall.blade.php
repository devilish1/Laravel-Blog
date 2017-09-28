<!DOCTYPE html>
<html>
    <head>
        <title>
            Test
        </title>
    </head>
    <body>
        <p>
            List of tasks
        </p>
        <ul>
            @foreach ($tasks as $task)
            <li>
                <a href="/tasks/{{$task->id}}">
                    {{$task->body}}
                </a>
            </li>
            @endforeach
        </ul>
        {{--
        <h2>
            Hello {{$name}}
        </h2>
        --}}
   <script type="text/javascript">
        var g_armorReduction = 0.03;
        var g_healthPerStrength = 13;
        var g_manaPerIntelligence = 7;
        var g_killExp = 50;



		var AbstractUnit = function(){
			this.name = "AbstractUnit";

			this.health = 0;
			this.mana = 0;
			this.exp = 0;

			this.baseStat = -1;

			this.strength = 0;
			this.agility = 0;
			this.intelligence = 0;
																				
			this.attackDmg = 0;
			this.armor = 0;

			this.baseHealth = 100;
			this.baseMana = 50;
			this.baseDamage = 25;
			this.baseIntelligence = 5;
			this.baseStrength = 5;
			this.baseAgility = 5;
			this.baseAttackDmg = 20;
			this.baseArmor = 1;

			this.dead = false;

			this.calculateStartingStats();
		};

		AbstractUnit.prototype = {
				attack: function(unit){
					var baseStatDmg = 0;

					if (unit instanceof AbstractUnit){
						this.attackDmg = this.baseAttackDmg + this.baseStatDmg();

						unit.health -= this.attackDmg + this.attackDmg * g_armorReduction * unit.armor;

						if(unit.health <= 0){
							unit.health = 0;
							unit.dead = true;
							this.exp += g_killExp;

							console.log("You killed " + unit.name);
							console.log("Your experience is now: " + this.exp);
						}
						else{
							console.log(unit.name + " has lost " + this.attackDmg + " health.");
						}
						return this.attackDmg;	
					}
					else{
						console.log("You can not attack a non unit!");
						return 0;
					}
					
				},

			calculateStartingStats: function(){
				this.health = this.baseHealth + g_healthPerStrength * this.strength;
				this.mana = this.baseMana + g_manaPerIntelligence * this.intelligence;
				this.attackDmg = this.baseAttackDmg + this.baseStatDmg();
			},

			baseStatDmg: function(){
				var baseStatDmg = 0;
				switch(this.baseStat){
							case 1: baseStatDmg = this.strength;
									break;
							case 2: baseStatDmg = this.agility;
									break;
							case 3: baseStatDmg = this.intelligence;
									break;
						}

				return baseStatDmg;
			}
		};
    </script>
        <script type="text/javascript">
            var unit1 = new AbstractUnit();
            var unit2 = new AbstractUnit();

            console.log(unit1);
            console.log(unit2);
            console.log(unit1 instanceof AbstractUnit);
            console.log(unit2 instanceof AbstractUnit);

            unit1.attack(unit2);

        </script>
    </body>
</html>
